Being computer science students, we deal with a lot of different technologies and topics every semester by attending classes and workshops, and working on projects. Under those circumstances we often find ourselves installing a lot of software in our main machines.
Most of the time, (out of inattention or laziness...) we keep the software installed in our machine even if we no longer need it, not only that but also we quit maintaining it (updates, updgares ...).
This, in fact, consumes disk space, contributes in the mess of our workspace and also can present a huge threat on our systems.
One of many alternatives of this monolithic approach is Compartmentalization, i.e to set an independent environnement for every project/workshop where we'll install the software needed separately. If the project is completed and we no longer need the development environement we can easily get rid of the compartment, without effecting our main system.

There is a lot of ways to implement Compartmentalization, in this tutorial we'll use virtualization.
For this matter we'll work with an awesome tool called Vagrant to create, and monitor  our virtual machines.
This tutorial is devided into two parts, the first is about how to setup vagrant, and how to use it. In the second part We'll create two example environnements: the first is a XAMP stack for web development using php, the second is a mini lab for machine learning with python.

# The setup
Before installing vagrant, we need to install a provider first. Vagrant support a lot of providers (MS Hyper-V, Vmware, Kvm ...), but Virtuabox has the best supported, and is the most common in the community.
If you're on Linux, you can easily install vagrant using you're favourite package manager (apt/snap/yum/pacman ...). Else if you're running windows, you'll need to install an ssh client too.
To sum up :
- We'll install Virtualbox.
- We'll install an SSH client.
- We'll install Vagrant.

# The awesome Vagrant
"Vagrant is a tool for building and managing virtual machine environments in a single workflow". In other words, Vagrant is a tool intended to save you from the pain of dealing directly with a VM hypervisor (e.g VirtualBox, VMware ...) by abstracting the hard to configure features and offering a simple and intuitive interface between the user and the hypervisor itself.
## Vagrant Boxes
In simple words, Vagrant boxes are collection of software built and packaged by the vagrant community. e.g (Ubuntu/trusty64 is a box that provides a lightweight ubuntu 14.04 as the OS / laravel/homestead is a box that comes with a debian and all the software needed to develop a laravel app)
There are thousands of vagrant box, for mostly every application you can think of (from developement to deveops to machine learning to whatever you want :D ) you can look for boxes here.
Vagrant uses the box command to deal with boxes:
`vagrant box add ubuntu/xenial64 #to download ubuntu xenial box`
`vagrant box update ubuntu/xenial94 #to update ubuntu box`
`vagrant box list # to list all the boxes installed`
`vagrant box delete ubuntu/xenial64 # to delete ubuntu box`

## The Vagrantfile
To create(initialize) a VM in vagrant we use : `vagrant init boxname` this command will do nothing but create a configuration file `Vagrantfile` which is a ruby script containing all the configuration variables related to our VM.
Let's go through the file quickly, pointing out the most useful parameter in our case:
- `config.vm.box` : denotes the box used in the vm.
- `config.vm.box_check_update` : if True Vagrant will check for box updates before starting the VM
- `config.vm.network` : those are the configs related to networking.
   - `config.vm.network "forwarded_port", guest: 80, host: 8080` : this is the very useful, it enable you to forward ports in the guest machine (VM) to port on the host (your machine)
- `config.vm.synced_folder "data", "/vagrant_data"` : set up shared folders between your machine and the VM.
- `config.vm.provider` : provider specific configs


