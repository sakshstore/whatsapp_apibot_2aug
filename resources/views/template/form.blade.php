 
        <div class="form-group">
            
            
            
  <input type="text" class="form-control" id="name" name="name" value="" required="">
                   {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}      
                      
                       </div>
    
           
          
          
              <div class="form-group">
            
            
               <textarea class="form-control editor"   id="message" name="message"  >
 
</textarea>
            
 
                   {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}      
                      
                       </div>
    
    
    
    
     
            
  
  <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button> 