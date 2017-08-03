(function () {
  'use strict'
  const fields = []
  const {
    curry,
    endsWith,
    forEach,
    isObject,
    uniqBy,
    keyBy,
    isNumber,
    upperFirst,
    snakeCase,
    head
  } = _

  function typeOf (id, value) {
    if (endsWith(id, 'Date')) {
      return 'date'
    }

    if (endsWith(id, 'Id') || endsWith(id, '_id')) {
      return 'string'
    }

    switch (typeof value) {
      case 'number':
        return Number.isInteger(value) ? 'integer' : 'decimal'
      default:
        return typeof value
    }
  }

  const fieldId = (key, prefix) => `${prefix}${key}`

  function makeField (endpoint, value, property, prefix = '') {
    const id = fieldId(property, prefix)

    fields.push({
      id,
      property,
      type: isNumber(value) ? 'METRIC' : 'DIMENSION',
      dataType: typeOf(id, value),
      uiName: snakeCase(id.replace('.', '_'))
        .split('_')
        .map(upperFirst)
        .join(' '),
      endpoint
    })
  }

  const makeItemField = e => (v, k) => makeField(e, v, k, 'item_')

  function run () {
    const parse = curry((endpoint, value, key) => {
      if (key === 'items') {
        forEach(head(value), makeItemField(endpoint))
      } else if (!isObject(value)) {
        makeField(endpoint, value, key)
      }
    })

    const textArea = document.createElement('textarea')

    forEach(vtexOrderLite, parse('list'))
    forEach(vtexOrder, parse('get'))

    textArea.value = JSON.stringify(
      keyBy(uniqBy(fields, 'id'), 'id'),
      null,
      2
    )
    textArea.style.width = '100vw'
    textArea.style.height = '70vh'

    document.body.appendChild(textArea)
  }

  window.onload = run
}())
