(function () {
  'use strict'
  const {
    assign,
    endsWith,
    isEmpty,
    isObject,
    map,
    concat,
    uniqBy,
    keyBy,
    isNumber,
    upperFirst,
    flatten,
    head,
    compact
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

  function makeField (value, property, prefix = '') {
    const id = fieldId(property, prefix)

    return {
      id,
      property,
      type: isNumber(value) ? 'METRIC' : 'DIMENSION',
      dataType: typeOf(id, value),
      uiName: id.split('_')
        .slice(isEmpty(prefix) ? 0 : 1)
        .map(upperFirst)
        .join(' ')
    }
  }

  const makeItemField = (v, k) => makeField(v, k, 'item_')

  function run () {
    function parse (value, key) {
      if (key === 'items') {
        return map(head(value), makeItemField)
      } else if (!isObject(value)) {
        return makeField(value, key)
      }
    }

    const textArea = document.createElement('textarea')
    const mark = endpoint => o => o && assign(o, {endpoint})

    const fields = keyBy(
      uniqBy(
        compact(
          concat(
            map(flatten(map(vtexOrderLite, parse)), mark('list')),
            map(flatten(map(vtexOrder, parse)), mark('get'))
          )
        ),
        'id'
      ),
      'id'
    )

    textArea.value = JSON.stringify(fields, null, 2)
    textArea.style.width = '100vw'
    textArea.style.height = '70vh'

    document.body.appendChild(textArea)
  }

  window.onload = run
}())
