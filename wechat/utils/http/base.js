import config from 'config.js'
//获取根域名地址
var baseurl = config.data.urls.baseurl
/**
 * 获取当前页面的路径
 */
function getRoute() {
  let pages = getCurrentPages();
  let currPage = null;
  if (pages.length) {
    currPage = pages[pages.length - 1];
  }
  return currPage.route
}

/**
 * 网路请求
 */
function request(params, noRefetch) {
  var url = baseurl + params.url;
  //每次请求数据前检测token是否存在以及是否有效
  var token = wx.getStorageSync('token')
  if (!token || token === null) {
    //获取要请求的路由
    let route = getRoute();
    switch (route) {
      default: break
      case 'pages/index/index':
          goToNext('/pages/common/login/login');
        break
    }
  }



  if (!params.type) {
    params.type = 'GET';
  }
  if (!params.data) {
    params.data = {}
  }
  //初始化token
  params.data.token = token;
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
      //检测登录状态是否失效
      if (res.data.status === '-100') {
        //跳转到登录页面
        goToNext()
      } else {
        if (params.sCallBack) {
          params.sCallBack(res);
        }
      }
    },
    fail: function(err) {
      if (params.eCallBack) {
        params.eCallBack(res);
      }
    }
  })
}

/*获得元素上的绑定的值*/
function getDataSet(event, key) {
  return event.currentTarget.dataset[key];
};

function goToNext() {
  wx.navigateTo({
    url: '../../pages/common/login/login',
  })
}

module.exports = {
  config: config,
  request: request,
  getDataSet: getDataSet
}