module.exports = [
    getSideBar('目录大纲', [
        ['/dashboard/outline', '首页大纲']
    ]),
    getSideBar('MongoDB', [
        ['/mongodb/mongodb-index', 'MongoDB'],
        ['/mongodb/install-red-hat', 'RedHat环境安装']
    ])
]

function getSideBar(_title, _children) {
    return {
        title: _title,
        collapsable: true,
        displayAllHeaders: true,
        children: _children
    }
}