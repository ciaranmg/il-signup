## IL Signup Plugin

The IL signup plugin can be used to insert e-letter signup boxes in your Wordpres pages or posts. Use the Shortcode syntax outlined below to enable it. The plugin is designed to be used with the Agora Signup App to handle the received data.



### Shortcode

The basic short code is: [ilsignup] Using the attributes you can customize the signup box.

Required Attributes

* source
* tyemail
* tyurl

Optional Attributes

* align
* tysubject
* btntext

Usage

Source
The source code used for the page or campaign so you can track the number of signups

EXAMPLE: source="XILK1A1"

tyemail
The name of the Thank-you email defined in the Signupapp

EXAMPLE: tyemail="_pge_argentina-thank-you"

tyurl
The URL of the thank-you page

EXAMPLE: tyurl="http://www1.internationalliving.com/sem/country/argentina/google/thankyou.html"

align
You can choose how the signup box will sit with the rest of your content. left, center, and right are valid options. The default setting is center.

EXAMPLE: align="center"

tysubject
You can customize the subject line of the thank-you email. The Default value is "Welcome to International Living Postcards"

EXAMPLE: tysubject="Welcome to IL Postcards - Here is your free report"

btntext
You can customize the text on the call-to-action button on the form. The default value is "Send My Free Report"

EXAMPLE: btntext="Sign me up"

