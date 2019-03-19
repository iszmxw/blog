//app.js
import base from './utils/http/base.js'
var urls = base.config.data.urls
App({
  onLaunch: function() {
    // 展示本地存储能力
    var logs = wx.getStorageSync('logs') || []
    logs.unshift(Date.now())
    wx.setStorageSync('logs', logs)
    var token = wx.getStorageSync('token')
    if (!token) {
      wx.navigateTo({
        url: './pages/common/login/login', //跳转页面的路径，可带参数 ？隔开，不同参数用 & 分隔；相对路径，不需要.wxml后缀
      })
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