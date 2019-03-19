import config from 'config.js'
//获取根域名地址
var baseurl = config.data.urls.baseurl
var token = wx.getStorageSync('token')
function getRoute () {
  let pages = getCurrentPages();
  let currPage = null;
  if (pages.length) {
    currPage = pages[pages.length - 1];
  }
  return currPage.route
}
function request(params, noRefetch) {
  //每次请求数据前检测token是否存在以及是否有效
  if (!token || token === null) {
    //获取要请求的路由
    let route = getRoute();
    switch (route) {
      case 'pages/common/login/login':
        break
      case 'pages/index/index':
        console.log(route)
        goToNext('/pages/common/login/login');
        console.log(2)
        break
    }
  }
  var url = baseurl + params.url;
  if (!params.type) {
    params.type = 'GET';
  }
  wx.request({
    url: url,
    data: params.data,
    method: params.type,
    header: {
      'content-type': 'application/json',
      'Cookie': 'session_id',
      'token': wx.getStorageSync('token')
    },
    success: function(res) {
      if (params.sCallBack) {
        params.sCallBack(res);
      }
    },
    fail: function(err) {
      if (params.eCallBack) {
        params.eCallBack(res);
      }
    }
  })
}

//未授权重试机制
function _refetch(params) {
  var token = new Token();
  token.getTokenFromServer((token) => {
    this.request(params, true);
  });
}

/*获得元素上的绑定的值*/
function getDataSet(event, key) {
  return event.currentTarget.dataset[key];
};

function goToNext(){
  wx.navigateTo({
    url: '../../pages/common/login/login',
  })
}

module.exports = {
  config: config,
  request: request,
  _refetch: _refetch,
  getDataSet: getDataSet
}