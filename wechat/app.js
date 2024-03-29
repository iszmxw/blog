//app.js
import base from './utils/http/base.js'
var urls = base.config.data.urls
App({
  onLaunch: function(options) {
    if (options.query) {
      if (options.query.article_id) {
        // 获取分享文章id
        wx.setStorageSync('article_id', options.query.article_id);
      }
    }
    // 获取用户信息
    wx.getSetting({
      success: res => {
        if (res.authSetting['scope.userInfo']) {
          // 已经授权，可以直接调用 getUserInfo 获取头像昵称，不会弹框
          wx.getUserInfo({
            success: res => {
              // 可以将 res 发送给后台解码出 unionId
              this.globalData.userInfo = res.userInfo

              // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
              // 所以此处加入 callback 以防止这种情况
              if (this.userInfoReadyCallback) {
                this.userInfoReadyCallback(res)
              }
            }
          })
        }
      }
    })
  },
  authLogin: function(userInfo) {
    var token = wx.getStorageSync('token')
    // 登录
    wx.login({
      success: res => {
        // 发送 res.code 到后台换取 openId, sessionKey, unionId
        base.request({
          url: urls.login,
          type: 'POST',
          data: {
            code: res.code,
            token: token,
            userInfo: userInfo
          },
          sCallBack: function(res) {
            if (res.data.status === 1) {
              let token = res.data.data.token
              wx.setStorageSync('token', token);
              wx.navigateBack({
                delta: 2,
              });
            } else {
              wx.showModal({
                title: '提示',
                content: res.data.msg,
              })
            }
          }
        })
      }
    })
  },
  globalData: {
    userInfo: null
  }
})