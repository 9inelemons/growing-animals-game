const routes = [
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
        path: '/',
        component: () => import('../pages/GamePage.vue'),
        name: 'game'
    },
];

export default routes;
