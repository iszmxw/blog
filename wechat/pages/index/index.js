//pages/index.js
import base from '../../utils/http/base.js'
//获取请求网址配置项
const urls = base.config.data.urls
var animation = wx.createAnimation()
var i_tips = 0
Page({
  data: {
    content: [
      "新增 友情链接，欢迎加链。",
      "新的一天。加油！",
      "还没加载完? 上啦刷新下试试看吧。",
      "偶尔有空的时候进来写写代码。",
      "首页基本写好了，找个时间排下内页。",
      "今天工作很忙，一大堆事情处理不完。"
    ],
    tips: '',
    list: {},
    category: {},
    category_id: '',
    pagesize: 20,
  },
  //传入内容，广播将会以动画播放这条内容
  autoUpdate: function(tips) {
    animation.translateY(-30).step({
      duration: 300,
      timingFunction: 'ease-in'
    })
    animation.opacity(0).translateY(30).step({
      duration: 1,
      timingFunction: 'step-start'
    })
    animation.opacity(1).translateY(0).step({
      duration: 300,
      timingFunction: 'ease-out'
    })
    this.setData({
      animationData: animation.export()
    })
    setTimeout(this.setData.bind(this, {
      tips: tips
    }), 300)
  },
  /**
   * 生命周期函数，监听页面显示
   */
  onShow: function() {
    var that = this
    var data = that.data
    var counts = data.content.length
    //定时器执行动画以及改变数据
    setInterval(() => {
      this.autoUpdate(data.content[i_tips])
      if (i_tips + 1 < counts) {
        i_tips++
      } else {
        i_tips = 0
      }
    }, 2000)
    wx.showLoading({
      title: '初始化加载中',
    })
    //获取栏目列表
    base.request({
      url: urls.get_category,
      sCallBack: function(res) {
        if(res.data.status === 1){
          that.setData({
            category: res.data.data.list
          })
        }
      }
    })
    //获取文章列表
    base.request({
      url: urls.index,
      data: {
        pagesize: that.data.pagesize,
      },
      sCallBack: function (res) {
        if(res.data.status === 1){
          that.setData({
            list: res.data.data.list
          })
          wx.hideLoading()
        }
      }
    })
  },
  //生命周期函数--监听页面加载
  onLoad: function() {},
  gotoCategory: function(option) {
    let id = base.getDataSet(option, 'id')
    let that = this
    that.data.pagesize = 20
    that.data.category_id = id
    //获取文章列表
    base.request({
      url: urls.index,
      data: {
        category_id: id,
        pagesize: 20,
      },
      sCallBack: function(res) {
        that.setData({
          list: res.data.data.list
        })
      }
    })
  },
  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function() {
    wx.showLoading({
      title: '数据加载中'
    })
    var that = this
    that.data.pagesize = that.data.pagesize + 10
    //上拉加载更多
    base.request({
      url: urls.index,
      data: {
        category_id: that.data.category_id,
        pagesize: that.data.pagesize
      },
      sCallBack: function(res) {
        if (res.data.status == 1) {
          that.setData({
            list: res.data.data.list
          })
          wx.hideLoading()
        } else {
          wx.showToast({
            title: '亲，到底啦！',
            icon: 'loading'
          })
        }
      }
    })
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
      title: '追梦小窝',
      path: '/pages/index/index'
    }
  },
  modalConfirm: function(res) {
    console.log(res)
  }
})