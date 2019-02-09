class Error {

    constructor() {
        this._name = []
        this._level = []
        this._class = []
        this._picture = []
    }

    get name() {
        return this._name;
    }

    set name(name){
        return this._name = name;
    }

}