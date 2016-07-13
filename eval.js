'use strict'
const dnode = require('dnode')

const server = dnode({
    exec (request, cb) {
        const instance = JSON.parse(request)

        cb(eval(`(${instance.fn})(${JSON.stringify(instance.data)})`))
    }
})

server.listen(7777)