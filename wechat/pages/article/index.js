// pages/article/index.js
import base from '../../utils/http/base.js'
const urls = base.config.data.urls
Page({
  /**
   * 页面的初始数据
   */
  data: {
    blog_id: '',
    title: '追梦小窝',
    content: ''
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function(options) {
    if (options.blog_id){
      wx.setStorageSync('blog_id', options.blog_id)
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
  onShow: function() {
    let blog_id = wx.getStorageSync('blog_id')
    let that = this
    wx.showLoading({
      title: '内容正在加载中',
    })
    base.request({
      url: urls.article,
      data: {
        blog_id: blog_id,
      },
      sCallBack: function(res) {
        that.setData({
          blog_id: blog_id,
          title: res.data.data.title,
          content: res.data.data.content
        })
        wx.hideLoading()
      }
    })
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
  onShareAppMessage(res) {
    if (res.from === 'button') {
      // 来自页面内转发按钮
      console.log(res.target)
    }
    return {
      title: this.data.title,
      path: '/pages/article/index?blog_id=' + this.data.blog_id
    }
  },
  gotoHome: function () {
    wx.navigateTo({
      url: '/pages/index/index'
    })
  }
})