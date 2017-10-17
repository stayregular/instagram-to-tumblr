# Instagram to Tumblr
Simple script to import latest 10 photos from a list of Instagram users to a Tumblr account through the Tumblr API.

## Installation

### Download it
Clone this repo or download the zip and extract it on your server.

`git clone thelink`

### Install dependencies

[Download composer here](https://getcomposer.org/download/) and run the following script locally in the project folder:

`php composer.phar install`

This installs all the necessary libraries required by certain scripts (like the Tumblr API). If the install was successful, you should have a vendor folder in the project root with subfolders such as "guzzle" or "symfony".

### Getting Your OAuth Tokens

1. [Register your application on Tumblr here](https://www.tumblr.com/oauth/apps)
2. Put your Consumer Key, Consumer Secret, and Callback URL into the classes/class.TumblrVerify.php file. Your callback URL will be the link to auth.php on your server.
3. Navigate to login.php and click the link provided.
4. You'll be redirected to Tumblr for verification. Approve it.
5. You'll be redirected back to your callback URL, which should be auth.php. Here you'll find your OAuth token and token secret, save these for later.

### Configure the script

1. Add your Consumer Key, Consumer Secret, OAuth Token, and OAuth Token Secret to the config.php file.
2. Add your blog to the index.php file (instead of weedporndaily)
3. Add which Instagram you want to import from to the index.php file ($user_array).

## ??? Profit

Run the script and you should see each photo that's imported printed on the page. And if you check Tumblr, it'll post instantaneously.

# Credits

Based on @rachelmcgrane's 'tumblr-photobot' repo and @thinkingboxmedia 'ShareAPI' repo. Uses the official @Tumblr API. And styled with @Dogfalo's Materialize CSS Framework.
