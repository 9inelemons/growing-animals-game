const routes = [
    {
        path: '/',
        component: () => import('../pages/HomePage.vue'),
        name: 'home'
    },
    {
        path: '/auth/register',
        component: () => import('../pages/auth/RegisterPage.vue'),
        name: 'register'
    },
    {
        path: '/auth/login',
        component: () => import('../pages/auth/LoginPage.vue'),
        name: 'login'
    },
    {
        path: '/game',
        component: () => import('../pages/GamePage.vue'),
        name: 'game'
    },
];

export default routes;
