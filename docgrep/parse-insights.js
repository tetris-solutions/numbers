window.onload = function () {
  /**
   * @type {Array.<HTMLElement>}
   */
  const codes = Array.prototype.slice.call(
    document.querySelectorAll('table td:first-child code')
  )
  const fields = {}

  /**
   *
   * @param {HTMLElement} node
   * @returns {string}
   */
  function contentOf (node) {
    return node.innerText.trim()
  }

  /**
   *
   * @param {HTMLElement} code
   */
  function extractField (code) {
    /**
     * @type {HTMLTableCellElement}
     */
    const td = code.closest('td')
    const type = contentOf(td.querySelector('div:last-child'))
    const description = contentOf(td.nextElementSibling.querySelector('p:nth-child(2)'))
    const id = contentOf(code)

    fields[id] = {
      id,
      type,
      description
    }
  }

  codes.forEach(extractField)

  console.log(JSON.stringify(fields, null, 2))
}