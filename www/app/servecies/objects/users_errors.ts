class users_errors {
    _loginError:String;
    _registrationError: String;

    get loginError ():String {
        return this._loginError;
    }
    set loginError ( loginError:String ) {
        this._loginError = loginError;
    }
    get registrationError ():String {
        return this._registrationError;
    }
    set registrationError ( registrationError:String ) {
        this._registrationError = registrationError;
    }
}