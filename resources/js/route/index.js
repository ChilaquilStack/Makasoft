import Pokemons from '../components/pokemons/index';
import Trainers from '../components/trainers/Trainer';

const routes = [
  { path: '/pokemons', component: Pokemons, name: 'pokemons'},
  { path: '/trainers', component: Trainers, name: 'trainers'}
]


export default routes;