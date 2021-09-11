import { createRouter, createWebHistory } from 'vue-router'

const getRouter = (data) => {
  const routes = data.map(item => {
    return {
      path: item.route,
      name: item.name,
      component: () => import(/* webpackChunkName: "[request]" */ `../views/${item.name}/Show.vue`),
      props: (route) => {routeParams: route.params}
    };
  });

  routes.push({ 
    path: '/:pathMatch(.*)*', 
    name: 'NotFound', 
    component: () => import(/* webpackChunkName: "notfound" */ `../views/error/NotFound.vue`),
  });

  return createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
  })
}

export default getRouter
