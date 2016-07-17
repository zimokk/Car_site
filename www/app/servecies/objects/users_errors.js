var users_errors = (function () {
    function users_errors() {
    }
    Object.defineProperty(users_errors.prototype, "loginError", {
        get: function () {
            return this._loginError;
        },
        set: function (loginError) {
            this._loginError = loginError;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(users_errors.prototype, "registrationError", {
        get: function () {
            return this._registrationError;
        },
        set: function (registrationError) {
            this._registrationError = registrationError;
        },
        enumerable: true,
        configurable: true
    });
    return users_errors;
})();
