module.exports = [
    getSideBar('五四战盟博客', [
        ['/dashboard/description', '博客介绍'],
        ['/dashboard/install', '博客安装'],
    ]),
    getSideBar('后台相关', [
        ['/mongodb/mongodb-index', 'MongoDB'],
        ['/mongodb/install-red-hat', 'RedHat环境安装']
    ]),
    getSideBar('前台相关', [
        ['/mongodb/mongodb-index', 'MongoDB'],
        ['/mongodb/install-red-hat', 'RedHat环境安装']
    ])
]

function getSideBar(_title, _children) {
    return {
        title: _title,
        collapsable: true,
        // displayAllHeaders: true,
        children: _children
    }
}