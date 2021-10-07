const Ziggy = {"url":"http:\/\/reservation04102021.test","port":null,"defaults":{},"routes":{"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"]},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"]},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"]},"reservation.index":{"uri":"reservation","methods":["GET","HEAD"]},"reservation.create":{"uri":"reservation\/create","methods":["GET","HEAD"]},"reservation.store":{"uri":"reservation","methods":["POST"]},"reservation.show":{"uri":"reservation\/{reservation}","methods":["GET","HEAD"],"bindings":{"reservation":"id"}},"reservation.edit":{"uri":"reservation\/{reservation}\/edit","methods":["GET","HEAD"],"bindings":{"reservation":"id"}},"reservation.update":{"uri":"reservation\/{reservation}","methods":["PUT","PATCH"],"bindings":{"reservation":"id"}},"reservation.destroy":{"uri":"reservation\/{reservation}","methods":["DELETE"],"bindings":{"reservation":"id"}}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };

export class ZiggyVue {
}
