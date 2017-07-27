(function () {
  'use strict'
  function parse ({items}) {
    const fields = {}

    const templateGoals = [
      'ga:goalXXCompletions',
      'ga:goalXXConversionRate',
      'ga:goalXXStarts'
    ]

    for (let i = 1; i <= 10; i++) {
      templateGoals.forEach(templateId => {
        const model = items.find(({id}) => id === templateId)
        const config = Object.assign({}, model)

        config.id = templateId.replace('XX', String(i))
        config.attributes = Object.assign({}, config.attributes)
        config.attributes.uiName = config.attributes.uiName.replace('XX', String(i))
        config.attributes.description = config.attributes.description.replace('the requested goal number', `Goal ${i}`)

        items.push(config)
      })
    }

    _.sortBy(items, 'id')
      .filter(({id}) => id !== 'ga:calcMetric_<NAME>')
      .forEach(({id, attributes}) => {
        fields[id] = attributes
      })


    const textArea = document.createElement('textarea')

    textArea.value = JSON.stringify(fields, null, 2)
    textArea.style.width = '100vw'
    textArea.style.height = '70vh'

    document.body.appendChild(textArea)
  }

  window.onload = () =>
    fetch('https://www.googleapis.com/analytics/v3/metadata/ga/columns')
      .then(r => r.json())
      .then(parse)
}())
