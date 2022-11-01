const navbar = [
    {
        text: 'Home',
        children: [
            {
                text: '首頁',
                children: [
                    '/',
                    '/first-article.md',
                ],
            },
        ],
    },
    {
        text: 'Subfolder',
        children: [
            {
                text: 'A Folder',
                // link: '/afold/second-article.md',
                children: [
                    '/afold/second-article.md',
                ],
                activeMatch: '^/bfold',
            },
            {
                text: 'B Folder',
                children: [
                    '/bfold/third-article.md',
                ],
                activeMatch: '^/afold',
            },
        ]
    }
];

export { navbar };
