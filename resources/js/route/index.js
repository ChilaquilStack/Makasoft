import users from '../components/users/index';
import rols from '../components/rols/index';
import error from '../components/error';

const routes = [
  {path: '*', component: error, name: 'error'},
  {path: '/', component: users, name:'users'},
  {path: '/rols', component: rols , name:'rols'},
]

export default routes;