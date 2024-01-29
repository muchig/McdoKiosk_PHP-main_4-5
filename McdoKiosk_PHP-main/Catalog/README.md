# McdoKiosk_PHP

#UNDERSTANDING GIT 

------------------------------------ ADDING CHANGES TO THE REPO -----------------------------
# there are three main steps to follow when adding changes to the repo online. To save local changes remotely you must first add, commit, and push all of your changes. these three steps must be done in order to successfully add the changes.



# git add -A means to add all modifies files to the staging process
git add -A

# git commit basically means to save the changes added in the staging process or from when you used "git add -A" and the quotation mark after -m means to add a message when saving the changes. These messages can be read by other poeple who have access in the repository.
git commit -m 'your message for others when adding changes'

# git push means to push the changes to the remote repository. From local changes being stored locally, push is the final step to add the local changes to the repo online.
git push origin main



----------------------------- ADDING REMOTE REPO TO YOUR LOCAL DEVICE ----------------------------------

# When a repo has been downloaded, you may need to set it up if you want to easily upload your changes or update your codes when new changes have been added. 

to clone the repo press ctrl+shift+p > type "clone" > paste link from repo

getting link from repo: 
  open repo from website > code > copy the link 
  
#git init means to initialize the repo. This code tells git that the current directory that you initialized is what you want to use when using git.
git init

# this assigns the link from the repo to your local folder ekalkdjflakjd
git remote add origin https://github.com/<usename>/<repo-name>.git
