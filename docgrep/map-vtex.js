(function () {
  'use strict'
  const fields = []
  const {
    curry,
    keys,
    endsWith,
    each,
    isArray,
    isPlainObject,
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

    if (endsWith(id, 'Id') || endsWith(id, '_id') || endsWith(id, '.id')) {
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
    if (value && isPlainObject(value)) {
      each(keys(value), k =>
        makeField(endpoint, value[k], k, `${prefix}${property}.`)
      )

      return
    }

    if (isArray(value)) {
      return
    }

    const id = fieldId(property, prefix)

    fields.push({
      id,
      property,
      endpoint,
      type: typeOf(id, value),
      description: snakeCase(id.replace('.', '_'))
        .split('_')
        .slice(-2)
        .map(upperFirst)
        .join(' ')
    })
  }

  const makeItemField = e => (v, k) => makeField(e, v, k, 'item_')

  function run () {
    const parse = curry((endpoint, value, key) => {
      if (key === 'items') {
        each(head(value), makeItemField(endpoint))
      } else {
        makeField(endpoint, value, key)
      }
    })

    const textArea = document.createElement('textarea')

    each(vtexOrderLite, parse('list'))
    each(vtexOrder, parse('get'))

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
