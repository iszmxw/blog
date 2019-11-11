import {
  Config
} from 'config.js';

class Token {

  constructor() {
    this.verifyUrl = Config.restUrl + 'token/verify';
    this.tokenUrl = Config.restUrl + 'token/user';
  }

  /**
   * 调用 API 接口，校验 token 是否有效
   */
  verify() {
    var token = wx.getStorageSync('token');
    if (token) {
      // 存在，就向服务器校验token
      this._veirfyFromServer(token);
    } else {
      // 不存在，就去服务器请求token
      this.getTokenFromServer();
    }
  }

  /**
   * 请求API接口，校验token的合法性
   * 如果不合法，会自动调用 getTokenFromServer 方法请求 token
   */
  _veirfyFromServer(token) {
    var that = this;
    wx.request({
      url: that.verifyUrl,
      method: 'POST',
      data: {
        token: token
      },
      success: function(res) {
        var valid = res.data.isValid;
        if (!valid) {
          that.getTokenFromServer();
        }
      }
    })
  }

  /**
   * 请求API接口，获取新的token
   */
  getTokenFromServer(callBack) {
    var that = this;
    wx.login({
      success: function(res) {
        // 既然时一个工具类，就应该存粹一点，不要用 base.js 里的 request(params) 方法发起网络请求了
        // 这一点很重要
        wx.request({
          url: that.tokenUrl,
          method: 'POST',
          data: {
            code: res.code
          },
          success: function(res) {
            wx.setStorageSync('token', res.data.token);
            callBack && callBack(res.data.token);
          }
        })
      }
    })
  }
}


export {
  Token
};