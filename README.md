<p dir="auto">
<img alt="GitHub release (latest by date)" src="https://img.shields.io/github/v/release/Alirezad07/X-Panel-SSH-User-Management">
</p>

# X Panel SSH User Management

### پنل مدیریت و فروش VPN  با پروتکل SSH

**امکانات**
<br>
ایجاد کاربر بدون محدودیت <br>
اعمال محدودیت در حجم مصرفی و تاریخ انقضا<br>
قابلیت محاسبه تاریخ انقضا در اولین اتصال<br>
اعمال محدودیت در چند کاربره بودن اکانت<br>
مشاهده کاربران آنلاین<br>
امکان بکاپ گیری از کاربران و ریستور بکاپ<br>
ربات تلگرام <br>
تنظیم پورت ورود برای پنل<br>
مولتی سرور (به زودی)<br>
اتصال API (به زودی)<br>

## Telegram Channel:
https://t.me/Xpanelssh

## حمایت از ما
حمایت های شما برای ما دلگرمی بزرگی است<br> 
Tether TRC20 USDT: `TYQraQ5JJXKyVD6BpTGoDYNhiLbFRfzVtV`<br>
ETH: `0x6cc08b2057EfAe4d76Af531e145DeEd4B73c9D7e`

# نصب


**سیستم عامل مورد نیاز**

CentOS 7+ <br>
Ubuntu 18+ <br>
Debian 8+ <br>

برای نصب و بروز رسانی می توانید از دستور زیر  استفاده کنید
```
bash <(curl -Ls https://raw.githubusercontent.com/Alirezad07/X-Panel-SSH-User-Management/master/install.sh --ipv4)
```

حل مشکل عدم ارتباط  تماس صوتی و تصویری در اپلیکشن
```
bash <(curl -Ls https://raw.githubusercontent.com/Alirezad07/X-Panel-SSH-User-Management/master/fix-call.sh --ipv4)
```
دستور بالا را در ترمینال وارد کنید سپس برای UDPGW پورت جدید تعریف کنید بهتر است به جای پورت 7300 پورت 7301 یا 7302 را تنظیم کنید
<br>
<br>

## بهینه سازی سرور
نصب و حذف تنظیمات با دستور زیر 
```
bash <(curl -Ls https://raw.githubusercontent.com/Alirezad07/X-Panel-SSH-User-Management/main/TCP-Tweaker --ipv4)
```
## فعال سازی SSL
```
bash <(curl -Ls https://raw.githubusercontent.com/Alirezad07/X-Panel-SSH-User-Management/main/ssl.sh --ipv4)
```
با استفاده از دستور بالا می توانید SSL را روی پنل نصب نمائید. به نکات زیر توجه کنید <br>
1- حتما قبل از نصب SSL پنل را بروز کنید<<br>
2- از هیچ دستور دیگری برای فعال سازی SSL استفاده نکنید<br>
3- دامنه یا ساب دامنه را به IP سرور متصل کنید <br>
4- دستور بالا را در ترمینال وارد کنید و مراحل نصب را پیش بروید<br>
SSL بر روی پورتی که روی پنل تعریف کرده اید نصب فعال شد. <br>

<picture>
<img alt="XPanel" src="https://raw.githubusercontent.com/Alirezad07/X-Panel-SSH-User-Management/main/xp1.jpg">
</picture>

<picture>
<img alt="XPanel" src="https://raw.githubusercontent.com/Alirezad07/X-Panel-SSH-User-Management/main/xp2.jpg">
</picture>

<picture>
<img alt="XPanel" src="https://raw.githubusercontent.com/Alirezad07/X-Panel-SSH-User-Management/main/xp3.jpg">
</picture>
