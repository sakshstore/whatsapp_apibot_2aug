 
        <div class="form-group">
            
            
            
  <input type="text" class="form-control" id="name" name="name" value="" required="">
                   <?php echo $errors->first('name', '<div class="invalid-feedback">:message</div>'); ?>      
                      
                       </div>
    
           
          
          
              <div class="form-group">
            
            
               <textarea class="form-control editor"   id="message" name="message"  >
 
</textarea>
            
 
                   <?php echo $errors->first('message', '<div class="invalid-feedback">:message</div>'); ?>      
                      
                       </div>
    
    
    
    
     
            
  
  <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button> <?php /**PATH /home/vikkinbot/laraauth9/resources/views/template/form.blade.php ENDPATH**/ ?>