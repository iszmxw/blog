// pages/article/index.js
import base from '../../../utils/http/base.js'
const urls = base.config.data.urls
var app = getApp();
Page({
  /**
   * 页面的初始数据
   */
  data: {},
  login(e) {
    let userInfo = e.detail.userInfo
    if (userInfo){
      app.authLogin(userInfo)
      console.log(userInfo);
      console.log(e);
    }
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function(options) {
    console.log(options);
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