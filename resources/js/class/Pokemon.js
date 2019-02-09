"use strict"

class Pokemon {

    constructor() {
        this._id = '',
        this._name = '',
        this._class = '',
        this._level = 0,
        this._picture = ''
    }

    get id() {
        return this._id;
    }

    set id(id) {
        this._id = id;
    }

    get name(){
        return this._name;
    }

    set name(name) {
        this._name = name;
    }

    get class(){
        return this._class;
    }

    set class(className){
        this._class = className;
    }

    get level() {
        return this._level;
    }

    set level(level) {
        this._level = level;
    }

    get picture(){
        return this._picture;
    }

    set picture(picture) {
        this._picture = picture;
    }

}

export default Pokemon;