// pages/login/login.js
import base from '../../utils/http/base.js'
const urls = base.config.data.urls
var app = getApp();
Page({
  /**
   * 页面的初始数据
   */
  closeMini: function() {
    wx.navigateBack({
      delta: 1
    })
  },
  formId: function(e) {
    // 获取表单id
    let formId = e.detail.formId;
    // 非真机运行时 formId 应该为 the formId is a mock one
    wx.setStorageSync('form_id', formId);
  },
  data: {},
  login(e) {
    let userInfo = e.detail.userInfo
    if (userInfo) {
      app.authLogin(userInfo)
    }
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function(options) {
    // console.log(options);
  },
  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function() {

  },
  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function() {

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
   * 用户点击右上角分享
   */
  onShareAppMessage: function() {

  }
})