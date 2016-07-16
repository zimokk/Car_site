class registration_validation {
    _isEmailValid:boolean;
    _isEmailInvalid:boolean;
    _isLoginValid:boolean;
    _isLoginInvalid:boolean;

    get isEmailValid ():boolean {
        return this._isEmailValid;
    }
    set isEmailValid ( isEmailValid:boolean ) {
        this._isEmailValid = isEmailValid;
    }
    get isEmailInvalid ():boolean {
        return this._isEmailInvalid;
    }
    set isEmailInvalid ( isEmailInvalid:boolean ) {
        this._isEmailInvalid = isEmailInvalid;
    }
    get isLoginValid ():boolean {
        return this._isLoginValid;
    }
    set isLoginValid ( isLoginValid:boolean ) {
        this._isLoginValid = isLoginValid;
    }
    get isLoginInvalid ():boolean {
        return this._isLoginInvalid;
    }
    set isLoginInvalid ( isLoginInvalid:boolean ) {
        this._isLoginInvalid = isLoginInvalid;
    }

    setEmailValidation ( value:boolean ) {
        this._isEmailValid = value;
        this._isEmailInvalid = ! value;
    }
    setLoginValidation ( value:boolean ) {
        this._isLoginValid = value;
        this._isLoginInvalid = ! value;
    }
}