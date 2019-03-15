"use strict"

import axios from 'axios';

const URL = 'users';

module.exports = {

    get: async () => await axios.get(URL)

}