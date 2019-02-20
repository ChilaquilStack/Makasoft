"use strict"

class User {

    constructor() {
        this._id = '',
        this._name = '',
        this._email = '',
        this._password = '',
        this._rol = '',
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

    get email(){
        return this._email;
    }

    set email(email){
        this._email = email;
    }

    get password() {
        return this._password;
    }

    set password(password) {
        this._password = password;
    }

    get picture(){
        return this._picture;
    }

    set picture(picture) {
        this._picture = picture;
    }

    get rol(){
        return this._rol;
    }

    set rol(rol) {
        this._rol = rol;
    }

}

export default User;