import config from 'config.js'
//获取根域名地址
var baseurl = config.data.urls.baseurl
/**
 * 网路请求
 */
function request(params, noRefetch) {
  var url = baseurl + params.url;
  //每次请求数据前将本地缓存的token传送到后台获取数据，后台判断token是否存在，以及有效
  var token = wx.getStorageSync('token')
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
      'content-type': 'application/json'
    },
    success: function(res) {
      //检测登录状态是否失效
      if (res.data.status === '-100') {
        //跳转到登录页面
        // goToLogin()
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

function goToLogin() {
  wx.navigateTo({
    url: '/pages/login/login',
  })
}

module.exports = {
  config: config,
  request: request,
  getDataSet: getDataSet
}