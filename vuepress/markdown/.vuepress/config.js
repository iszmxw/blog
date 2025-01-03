const _nav = require('./nav')
const _sidebar = require('./sidebar')

module.exports = {
    title: '五四战盟博客',
    description: '五四战盟博客开发文档',
    base: '/blog/',
    port: '',
    dest: '../docs',
    head: [
        ['link', { rel: 'icon', href: '/assets/img/xw.svg' }],
        ['meta', { 'name': 'viewport', content: "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" }],
        ['script', { src: 'https://s4.cnzz.com/z_stat.php?id=1279222603&web_id=1279222603' }]
    ],
    markdown: {
        lineNumbers: true, // 代码显示行号
        // markdown-it-anchor 的选项
        // anchor: { permalink: false },
        // // markdown-it-toc 的选项
        // toc: { includeLevel: [1, 2] },
        // config: md => {
        //   // 使用更多 markdown-it 插件！
        //   md.use(require('markdown-it-xxx'))
        // }
    },
    themeConfig: {
        logo: '/assets/img/xw.svg',
        nav: _nav,
        sidebar: _sidebar,
        sidebarDepth: 1,
        lastUpdated: '最近更新', // 显示更新时间
        searchMaxSuggestoins: 10,
        displayAllHeaders: true,
        serviceWorker: {
            updatePopup: true,
            // updatePopup: {
            //   message: "New content is available.",
            //   buttonText: 'Refresh'
            // }
        },
        // 假定 GitHub。也可以是一个完整的 GitLab URL。
        repo: 'https://gitee.com/iszmxw/blog.git'
    },
    plugins: [
        // 'axios'  // 配置插件
    ]
}