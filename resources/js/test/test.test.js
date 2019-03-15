"use strict";

import axios from 'axios';

test('adds 1 + 2 to equal 3', async () => {
    
    const response = await axios.get('users');
    
    expect(response).toHaveProperty('data');

});