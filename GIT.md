# Git

##### Table of contents

* [Resources](#resources)
* [Commands](#commands)
* [Inspect global config](#inspect-global-config)
* [Global .gitignore](#global-gitignore)
* [Change Core Editor](#change-core-editor)
* [Commit Template](#commit-template)
* [Colors](#colors)
* [Aliases](#aliases)

## Resources

* [Git Documentation](https://git-scm.com/docs)
* [Code Academy: Learn Git](https://www.codecademy.com/learn/learn-git)
* [Learn Git Branching](https://learngitbranching.js.org/)
* [Git Katas](https://www.git-tower.com/blog/git-cheat-sheet/)
* [Code Academy: Learn the Command Line](https://external.codecademy.com/learn/learn-the-command-line)
* [Git - The Simple Guide](http://rogerdudler.github.io/git-guide/)
* [Oh Shit Git](http://ohshitgit.com/)
* [Pro Git Book](https://git-scm.com/book/en/v2)
* [Git Cheat Sheet](https://www.git-tower.com/blog/git-cheat-sheet/)

## Commands

| Commando  | Explanation |
|-------|-------    |
|**`git clone`**| |
|`git clone /path/to/repository` | Clone a repository |
|`git clone https://github.com/jesperorb/json-server-heroku.git` | basic clone |
|`git clone https://github.com/jesperorb/json-server-heroku.git my-own-folder-name` |with custom folder name (not the same as the repo name) |
| `git clone git@github.com:jesperorb/json-server-heroku.git` | only if you have manually set up SSH |
| **`git init`** | Initiate a new repo in current folder (without clone) |
| **`git add`** | |
| `git add` | Add files to staging area, must before commiting |
| `git add .` | Adds all files in folder |
| `git add file-name another-file-name`| adds one or more files |
| `git add -p` | staging parts of files (chunks), does not stage the whole file, you get to select parts of it |
| **`git commit`** | |
| `git commit -m "Your message"` | Commits with a git message | 
| `git commit` | without message, opens an editor where you have to input a message |
| `git commit -m "Title message" -m "Extra description message"`| adds both a short summary and a longer description |
| `git commit -a -m "Your message"`| adds all files (`git add .`) and commits these changes. Merge between `git add` and `git commit`|
| `git commit --amend --no-edit` | merges your new changes into your previous commit and does not prompt for a new message
| **`git remote`** | | 
| `git remote add remote-name remote-url` | adds a remote name and url to push to | 
| `git remote add origin https://github.com/jesperorb/json-server-heroku.git` | binds the remote url to the name _origin_ (usually the github repo) | 
| `git remote rm origin` | removes the remote with the name _origin_ (usually the github repo) | 
| `git remote -v` | shows which remotes you have and which urls corresponds |
| **`git status/log`** | |
| `git log` | show all recent commits |
| `git log --graph --oneline` | pretty prints the log | 
| `git status` | shows your current status and changes | 
| **`git push`** | |
| `git push remotename branchname` | pushes a specfic branch to specific remote | 
| `git push origin master` | pushes the local master branch to the remote master branch |
| `git push origin local-branch-name:different-remote-branch-name` | pushes a local branch to a remote branch with a different name | 
| `git push --all origin` | pushes all branches to remote |
| **`git pull/fetch`** | |
| `git pull remote branch` | pulls down a specifick remote branch | 
| `git pull` | fetch and merge changes on the remote server to your working directory | 
| `git pull origin master` | fetches changes from a specific remote (origin) and a specific branch (master) | 
| `git fetch`|  fetches origin branches without merging with local branches. All origins are located in `origin/branch-name` | 
| **`git checkout`** ||
| `git checkout` | changes between files, commits and branches | 
| `git checkout branch-name`| switch to a branch |
| `git checkout -`|  switch between the last used branch | 
| `git checkout -b branch-name` | creates a branch and switches to that branch |
| `git checkout -- file-name`| remove changes that have been done before they have been added (before `git add`), removes all changes done to that file |
| `git checkout -- .`| remove all changes done to all files, if done before `git add` |
| **`git reset`** | |
| `git reset` | resets an added file or resets your files to a previous commit |
| `git reset HEAD file-name` | resets a staged file (if you have used `git add` this will revert that command on that file) but keeps the changes |
| `git reset HEAD .` | resets all staged files but keeps the changes |
| `git reset commit-hash` | resets to a previous commit, must use a commit hash |
| `git reset --soft commit-hash` | does a soft reset, keeps changes but resets git status |
| `git reset --hard commit-hash` | throws away changes and resets to a previous commit |
| `git reset --hard HEAD~3` | resets 3 commit from current commit, the number indicates how far back you want to reset |
| `git reset --hard origin/master` | replaces your changes with the changes on master branch on the origin (hard reset from remote) |
| **`git merge/rebase`** ||
| `git merge branch-name` | merges a branch into your current branch |
| `git rebase master` | if you are on a different branch than master, syncs your branch with the master branch |
| **`git diff`** ||
| `git diff` | compares files or branches on what has changed |
| `git diff filename` | not yet added changes |
| `git diff --cached filename` | added changes diff |
| `git diff a-branch another-branch` | compares to branches |

## Inspect global config

All settings that are created with:
```
git config --global
```
will be saved to a `.gitconfig`-file in your home directory. If you want to know where it is and inspect its content you can run this command and get the path to the file:
```
git config --list --show-origin
```
Then you can edit the file with your favorite editor and save it.

## Global .gitignore

You can setup `git` to always ignore a certain file or folder. It is almost as simple as setting up a regular `.gitignore`.
The commend below will assume that this file is in your home directory `~` on mac/unix and `%USERPROFILE%` on Windows. But it will not create the file.

On macOS/UNIX / Git Bash:
```
git config --global core.excludesfile '~/.gitignore'
```


After you've done this. Create the `.gitignore` file in your home directory and add whatever you like, for example: `node_modules`. 

On Windows CMD:
```
git config --global core.excludesfile "%USERPROFILE%\.gitignore"
```

After you've done this. Create the `.gitignore` file in your home directory and add whatever you like, for example: `node_modules`. 
This will be ignored for all future projects that uses `git`.

## Change core editor

In the `.gitconfig` file or with the global config-command from the terminal you can set the default editor for `git` to use. In my `.gitconfig` I have the following lines:

```
[core]
    editor = vim
    excludesfile = /Users/jesperorb/.gitignore
```

This means that I am using [vim](https://vim.rtorr.com/) as my default editor for editing commit message. This may or may not be what you want. You can edit this to the editor of your choice if you want.
If you for example want to use _Sublime Text_ for editing commit messages you can do the following.

macOS
```
git config --global core.editor "subl -n -w"
```

Windows
```
git config --global core.editor "'C:\Program Files\Sublime Text 3\subl.exe' -w"
```

**Be advised that on windows this may not be the correct path to sublime, check your own path first**


## Commit Template

You can create a template for your commit messages that show every time you make a commit that supplies the commit message with a structure. 
The template can be located anywhere and is basically just a textfile, the important part is linking it to your `.gitconfig`

```
git config --global commit.template ~/.gitmessage
```

or if you prefer using `.gitconfig`:

```
[commit]
  template = ~/.gitmessage
```

Now you can create the `.gitmessage`-file and add some comments to it:

```bash
# If applied, this commit will...

# Explain why this change is being made

```
Save the file and do a commit to see the new commit template.


## Colors

Add colors to git if you are running a shell with no colors. I don't have these settings because I am running [hyperterm](https://hyper.is/) with the shell `zsh` and the config [oh-my-zsh](https://github.com/robbyrussell/oh-my-zsh) which does this for me. If you are using Windows I recommend using [cmder](http://cmder.net/).

```
git config --global color.ui auto
git config --global color.branch auto
git config --global color.status auto
```
## Aliases

You can set custom shortcuts to frequently used commands in git. This can also be set in your shell if you want.
```
git config --global alias.st status
```

Now you can reference `status` with `st`:

```bash
git st
```

Can be useful for longer commands like this one to display the git log in a nice format:

```bash
git config --global alias.hist git log --graph --pretty='\''%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr) %C(bold blue)<%an>%Creset'\'' --abbrev-commit --all
```

All aliases will be saved to the `.gitconfig`-file

```
[alias]
    st = status
    hist = git log --graph --pretty='\''%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr) %C(bold blue)<%an>%Creset'\'' --abbrev-commit --all
```

* [Source: Git - Git Alises](https://git-scm.com/book/en/v2/Git-Basics-Git-Aliases)
* [oh-my-zsh: alises](https://github.com/robbyrussell/oh-my-zsh/wiki/Cheatsheet#git)