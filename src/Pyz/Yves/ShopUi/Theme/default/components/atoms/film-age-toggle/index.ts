import register from 'ShopUi/app/registry';
export default register(
    'film-age-toggle',
    () =>
        import(
            /* webpackMode: "lazy" */
            /* webpackChunkName: "film-age-toggle" */
            './film-age-toggle'
        ),
);
