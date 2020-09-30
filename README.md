![HypeTracker](https://github.com/hype-tracker/tree/feat-add-laravel/docs/logo.png)

![Current Version](https://img.shields.io/github/v/tag/justinhodev/hype-tracker?style=flat-square)
![StyleCI](https://github.styleci.io/repos/173895523/shield?branch=feat-add-laravel)
![License](https://img.shields.io/github/license/justinhodev/hype-tracker?style=flat-square)

---

**THIS IS THE V2 BRANCH OF HYPETRACKER - REFACTORING V1 ONTO LARAVEL**

HypeTracker is a data aggregator application for social media 'impressions' on sneakers bought and sold in the aftermarket.

See my blog detailing [what HypeTracker is](https://blog.justinho.studio/designing-a-database-to-track-my-sneakers) and [why I am refactoring it](https://blog.justinho.studio/revisiting-my-project-from-2018)

# Changelog / Goals for V2

- ~~migrate database schema~~ see PR #4
- ~~migrate internal sneakers API~~ see PR #7
- migrate front-end
- deploy as demo / push as v2
- add social media api scraping

# Getting Started

## Requirements

### [Homestead](https://laravel.com/docs/master/homestead)

- PHP ^7.3
- Composer ^1.10.13
- Vagrant ^2.2.10 (with your choice of virtualization layer)
- (example) VirtualBox ^6.1.14 (with Vagrant's VirtualBox provider)

```sh
$ git clone https://github.com/justinhodev/hype-tracker.git
$ cd hype-tracker

# Install Composer Dependencies
$ composer install

# Prepare config for Homestead
$ composer homestead

# Provision the VM
$ vagrant up

# SSH into Vagrant Box
$ vagrant ssh
```

### Docker

coming soon

# Database Entity Relationship Model

![ER Diagram](https://github.com/hype-tracker/tree/feat-add-laravel/docs/er-diagram.png)
