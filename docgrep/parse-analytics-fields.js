window.onload = function () {
  const fields = {}

  function contentOf (node) {
    return node.innerText.trim()
  }

  function toArray (ls) {
    return Array.prototype.slice.call(ls)
  }

  /**
   *
   * @param {HTMLAnchorElement} a
   */
  function isFieldAnchor (a) {
    const href = a.getAttribute('href')
    const isDeprecated = a.parentNode.classList.contains('deprecated')
    const supposedKey = a.parentNode.id

    return !isDeprecated && href.match(/^dimsmets/) && href.includes(`jump=${supposedKey}`)
  }

  /**
   *
   * @param {HTMLAnchorElement} fieldAnchor
   */
  function parseField (fieldAnchor) {
    const id = contentOf(fieldAnchor)
    /**
     *
     * @type {HTMLDivElement} detailsDiv
     */
    const detailsDiv = fieldAnchor.parentElement.nextElementSibling

    const name = contentOf(detailsDiv.querySelector('code'))
    const description = contentOf(detailsDiv.querySelectorAll('p')[2])
    const type = contentOf(detailsDiv.querySelector('td > code'))

    fields[id] = {id, name, description, type}
  }

  toArray(document.querySelectorAll('h3 > a'))
    .filter(isFieldAnchor)
    .forEach(parseField)

  const textArea = document.createElement('textarea')

  textArea.value = JSON.stringify(fields, null, 2)
  textArea.style.width = '100vw'
  textArea.style.height = '70vh'

  document.body.insertBefore(textArea, document.body.firstChild)
}
