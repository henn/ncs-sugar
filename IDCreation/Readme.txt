1. Copy the "ncs_framework" folder over to the root sugarcrm directory. 

The reason behind the ncs_framework folder here is that this code needed 
to be reusable across all modules. So, it made more sense to start our 
own ncs_framework where the majority of our custom code will be. So, how 
this works is simple, you will include this file (ncs_framework/ncs_controller.php) 
wherever you need to call it. When you call it, you pass through the current bean. 
It creates a reference to the bean (in case it changes during any of the processes 
that are being called) and then you call your function. You can see how this works 
in any of the view.edit.php files. The reason this is a good idea is that if we 
decide, in the future, that the ID needs to change for whatever reason, we can change 
it quickly in one place. Instead of having to change it in many, many files. It 
also allows you to do complicated processes with few lines of code, as noted below.

Example (3 lines of code to generate unique ID for the Name field):
$ncs = new NCS($this->bean);
$ncs->identifier = 'DU';
$this->ss->assign("NAME", $ncs->get_name());

2. The only files that you need to copy over is the 
custom/modules/<module name>/views/view.edit.php file and the 
custom/modules/<module name>/metadata/editviewdefs.php file. 
These are the only files that you need to copy over to update your instance.
