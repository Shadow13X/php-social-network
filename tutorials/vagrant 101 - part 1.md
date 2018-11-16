Being computer science students, we deal with a lot of different technologies and topics every semester by attending classes and workshops, and working on projects. Under those circumstances we often find ourselves installing a lot of software in our main machines.

Most of the time, (out of inattention or laziness...) we keep the software installed in our machine even if we no longer need it, not only that but also we quit maintaining it (updates, upgrades ...).

This, in fact, consumes disk space, contributes in the mess of our workspace and also can present a huge threat on our systems.
One of many alternatives of this monolithic approach is Compartmentalization, i.e to set an independent environment for every project/workshop where we'll install the software needed separately. 
If the project is completed and we no longer need the development environment we can easily get rid of the compartment, without effecting our main system.

There is a lot of ways to implement Compartmentalization, in this tutorial we'll use virtualization.
For this matter we'll work with an awesome tool called Vagrant to create, and monitor  our virtual machines.

This tutorial is divided into two parts, the first is about how to setup vagrant, and how to use it. In the second part We'll create two example environments: the first is a XAMP stack for web development using php, the second is a mini lab for machine learning with python.

# The setup
Before installing vagrant, we need to install a provider first. Vagrant support a lot of providers (MS Hyper-V, Vmware, Kvm ...), but Virtualbox has the best supported, and is the most common in the community.
If you're on Linux, you can easily install vagrant using you're favourite package manager (apt/snap/yum/pacman ...). Else if you're running windows, you'll need to install an ssh client too.
To sum up :
- We'll install [Virtualbox](https://www.virtualbox.org/wiki/Downloads).
- We'll install an [SSH client](https://www.putty.org/).
- We'll install [Vagrant](https://www.vagrantup.com/downloads.html).

# The awesome Vagrant

> Vagrant is a tool for building and managing virtual machine environments in a single workflow. 

In other words, Vagrant is a tool intended to save you from the pain of dealing directly with a VM hypervisor (e.g VirtualBox, VMware ...) by abstracting the hard to configure features and offering a simple and intuitive interface between the user and the hypervisor itself.

## Vagrant Boxes
In simple words, Vagrant boxes are collection of software built and packaged by the vagrant community. e.g (Ubuntu/trusty64 is a box that provides a lightweight ubuntu 14.04 as the OS / laravel/homestead is a box that comes with a debian and all the software needed to develop a laravel app)
There are thousands of vagrant box, for mostly every application you can think of (from development to deveops to machine learning to whatever you want :D ) you can look for boxes [here](https://app.vagrantup.com/boxes/search).
Vagrant uses the box command to deal with boxes:

    vagrant box add ubuntu/xenial64 #to download ubuntu xenial box
    vagrant box update ubuntu/xenial94 #to update ubuntu box
    vagrant box list # to list all the boxes installed
    vagrant box delete ubuntu/xenial64 # to delete ubuntu box

## The Vagrantfile
To create(initialize) a VM in vagrant we use : `vagrant init boxname` this command will do nothing but create a configuration file `Vagrantfile` which is a ruby script containing all the configuration variables related to our VM.
Let's go through the file quickly, pointing out the most useful parameter in our case:

- `config.vm.box` : denotes the box used in the vm.

- `config.vm.box_check_update` : if True Vagrant will check for box updates before starting the VM

- `config.vm.network` : those are the configs related to networking.

    - `config.vm.network "forwarded_port", guest: 80, host: 8080` : this is the very useful, it enable you to forward ports in the guest machine (VM) to port on the host (your machine)

- `config.vm.synced_folder "data", "/vagrant_data"` : set up shared folders between your machine and the VM.

- `config.vm.provider` : provider specific configs

You can write you own Vagrantfile from scratch of course.

## Let's Rock
The next step is setting up the vm and starting it.
    
    vagrant up
    vagrant ssh
The first command will setup based on the configurations in the Vagrantfile the virtual machine and start it. 
The second will ssh into the VM an Huuuuray.

## Provisioning
One of the best features in Vagrant is provisioning. It enables us to setup custom and highly portable virtual machine. To understand provisioning let's look at an exemple.
One of the easiest provisioners in vagrant is the shell provisioner(even inline or with a path).

      config.vm.provision "shell", inline: "echo hello" 
      config.vm.provision "shell", path: "script.sh"

In the first example, vagrant will execute the shell command `echo hello`, after setting up our VM at the first time.
In the second, vagrant will execute script.sh after setting up our VM at the first time.
This is very helpful especially if we want to build many machine with the same initial setup and configurations.

## Misc
Finally, I'd like to bring you attenting to some useful command:

    vagrant status # to know the status of the vm
    vagrant halt # to shutdown the vm
    vagrant suspend # to suspend the vm 
    vagrant resume # to resume a suspended vm
    vagrant reload # to reboot a vm (load the new Vagrantfile)
    vagrant plugin # to manage plugins
    vagrant destroy # to destroy a machine and delete all it's files
You can learn more about vagrant from the manuals if you're using a Unix, otherwise from the --help or even from the docs in their website. 
