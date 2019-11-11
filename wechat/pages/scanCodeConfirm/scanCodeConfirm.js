// pages/scanCodeConfirm/scanCodeConfirm.js
import base from '../../utils/http/base.js'
const urls = base.config.data.urls
Page({

  /**
   * 页面的初始数据
   */
  data: {

  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function(options) {
    // 获取后台传递过来的uuid
    if (options.uuid) {
      wx.setStorageSync('uuid', options.uuid);
    }
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function() {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function(options) {
    let uuid = wx.getStorageSync('uuid');
    let token = wx.getStorageSync('token');
    if (uuid) {
      base.request({
        url: urls.scan_code,
        type: 'POST',
        data: {
          uuid: uuid,
          token: token
        },
        sCallBack: function(res) {
          if (res.data.status == 1) {
            wx.showToast({
              title: res.data.msg,
              icon: 'success',
              duration: 2000,
              success: function() {
                setTimeout(function() {
                  //要延时执行的代码
                  // wx.navigateTo({
                  //   url: '/pages/scanCode/scanCode'
                  // })
                }, 2000)
              }
            })
          }
        }
      })
    } else {
      this.gotoPage()
    }
  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function() {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function() {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function() {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function() {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function() {

  },
  confirmLogin: function() {
    let uuid = wx.getStorageSync('uuid');
    let token = wx.getStorageSync('token');
    if (uuid) {
      base.request({
        url: urls.scan_code_confirm,
        type: 'POST',
        data: {
          uuid: uuid,
          token: token
        },
        sCallBack: function(res) {
          if (res.data.status == 1) {
            wx.showToast({
              title: '登录成功！',
              icon: 'success',
              duration: 2000,
              success: function() {
                setTimeout(function() {
                  //要延时执行的代码
                  wx.reLaunch({
                    url: '/pages/scanCode/scanCode'
                  })
                }, 2000)
              }
            })
          }
        }
      })
    } else {
      wx.showModal({
        title: '提示',
        content: '请重新扫描二维码',
      })
    }
  },
  gotoPage: function() {
    wx.reLaunch({
      url: '/pages/scanCode/scanCode'
    })
  }
})