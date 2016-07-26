var registration_validation = (function () {
    function registration_validation() {
    }
    Object.defineProperty(registration_validation.prototype, "isEmailValid", {
        get: function () {
            return this._isEmailValid;
        },
        set: function (isEmailValid) {
            this._isEmailValid = isEmailValid;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(registration_validation.prototype, "isEmailInvalid", {
        get: function () {
            return this._isEmailInvalid;
        },
        set: function (isEmailInvalid) {
            this._isEmailInvalid = isEmailInvalid;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(registration_validation.prototype, "isLoginValid", {
        get: function () {
            return this._isLoginValid;
        },
        set: function (isLoginValid) {
            this._isLoginValid = isLoginValid;
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(registration_validation.prototype, "isLoginInvalid", {
        get: function () {
            return this._isLoginInvalid;
        },
        set: function (isLoginInvalid) {
            this._isLoginInvalid = isLoginInvalid;
        },
        enumerable: true,
        configurable: true
    });
    registration_validation.prototype.setEmailValidation = function (value) {
        this._isEmailValid = value;
        this._isEmailInvalid = !value;
    };
    registration_validation.prototype.setLoginValidation = function (value) {
        this._isLoginValid = value;
        this._isLoginInvalid = !value;
    };
    return registration_validation;
})();
