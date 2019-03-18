import config from 'config.js'
//获取根域名地址
var baseurl = config.data.urls.baseurl
// 当noRefech为true时，不做未授权重试机制
function request(params, noRefetch) {
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

module.exports = {
  config: config,
  request: request,
  _refetch: _refetch,
  getDataSet: getDataSet
}