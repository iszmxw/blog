//pages/index.js

const app = getApp();
// var url = 'https://54zm.com/api/wechat_xcx/index';
var url = 'https://ctwxl.com';
var animation = wx.createAnimation()
var i_tips = 0;
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
    tips:'',
    list:{},
    pagesize: 10,
  },
//生命周期函数--监听页面加载
onLoad: function () {
var that = this
var data = that.data;
//传入内容，广播将会以动画播放这条内容
function update(tips) {
  animation.translateY(-30).step({ duration: 300, timingFunction: 'ease-in' })
  animation.opacity(0).translateY(30).step({ duration: 1, timingFunction: 'step-start' })
  animation.opacity(1).translateY(0).step({ duration: 300, timingFunction: 'ease-out' })
  that.setData({
    animationData: animation.export()
  })
  setTimeout(that.setData.bind(that, { tips: tips }), 300)
}
var counts = data.content.length;
//定时器执行动画以及改变数据
setInterval(() => {
    update(data.content[i_tips]);
    if (i_tips+1 < counts){
      i_tips++; 
    }else{
      i_tips = 0;
    }
}, 2000)

    
wx.showToast({
  title: '加载中',
  icon: 'loading',
  duration: 2000
});
wx.request({
  url: url,
  data: {
    pagesize: that.data.pagesize,
  },
  header: {
    //设置参数内容类型为json
    'content-type': 'application/json'
  },
  success: function (res) {
    console.log(res);
    that.setData({
      list: res.data.list
    })
  }
})
  },
/**
 * 页面上拉触底事件的处理函数
 */
  onReachBottom: function () {
    wx.showToast({
      title: '加载数据中',
      icon: 'loading',
      duration: 2000
    });
    var that = this
    that.data.pagesize = that.data.pagesize + 10;
    wx.request({
      url: url,
      data: {
        pagesize: that.data.pagesize,
      },
      header: {
        //设置参数内容类型为json
        'content-type': 'application/json'
      },
      success: function (res) {
        if (res.data.status == 1) {
          that.setData({
            list: res.data.list
          })
        } else {
          wx.showToast({
            title: '亲，到底部啦！',
            icon: 'loading',
            duration: 2000
          });
        }
      }
    })
  },
})