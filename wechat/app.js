//app.js
import base from './utils/http/base.js'
var urls = base.config.data.urls
const QQMapWX = require('./utils/libs/qqmap-wx-jssdk/qqmap-wx-jssdk.js')
const wxMap = new QQMapWX({
  key: 'J5HBZ-NBP3K-CDIJ3-ATAMZ-ZV6EE-IDB44' // 必填
});
App({
  onLaunch: function(options) {
    //初始化地理位置
    this.getAddress()
    // console.log(options);
    if (options.query) {
      if (options.query.article_id) {
        // 获取分享文章id
        wx.setStorageSync('article_id', options.query.article_id);
      }
      if (options.query.uuid) {
        // 获取后台传递过来的uuid
        wx.setStorageSync('uuid', options.query.uuid);
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
    var form_id = wx.getStorageSync('form_id')
    // 登录
    wx.login({
      success: res => {
        var address = this.globalData.address
        console.log(address)
        // 发送 res.code 到后台换取 openId, sessionKey, unionId
        base.request({
          url: urls.login,
          type: 'POST',
          data: {
            code: res.code,
            token: token,
            userInfo: userInfo,
            address: address,
            form_id: form_id
          },
          sCallBack: function(res) {
            if (res.data.status === 1) {
              let token = res.data.data.token
              wx.setStorageSync('token', token);
              wx.navigateBack({
                delta: 2,
              })
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
    userInfo: null,
    address: ''
  },
  getAddress: function() {
    let that = this
    // 授权地理位置
    wx.getLocation({
      type: 'gcj02',
      success: function(res) {
        var latitude = res.latitude
        var longitude = res.longitude
        wxMap.reverseGeocoder({
          location: {
            latitude: latitude,
            longitude: longitude
          },
          success: function(res) {
            const address = res.result.address
            const {
              city
            } = res.result.address_component
            that.globalData.address = address
          },
        });
      },
      fail(res) {
        console.log(res)
      }
    })
  }
})