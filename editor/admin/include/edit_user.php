 < ? p h p   
 
                 i f   ( i s s e t ( $ _ G E T [ ' p _ i d ' ] ) )   { 
                 	 $ t h e _ p o s t _ i d   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ _ G E T [ ' p _ i d ' ] ) ; 
 
 
                 } 
                                         
               $ q u e r y   =   " s e l e c t   *   f r o m   p o s t   W H E R E   p o s t _ i d   =   ' $ t h e _ p o s t _ i d ' " ; 
               $ s e l e c t _ p o s t s _ b y _ i d   =   m y s q l i _ q u e r y ( $ c o n n e c t i o n ,   $ q u e r y ) ; 
                                 
                                   w h i l e   ( $ r o w   =   m y s q l i _ f e t c h _ a s s o c ( $ s e l e c t _ p o s t s _ b y _ i d ) )   { 
                                         $ p o s t s _ i d   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' p o s t _ i d ' ] ) ; 
                                         $ p o s t s _ a u t h o r   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' p o s t _ a u t h o r ' ] ) ; 
                                         $ p o s t s _ t i t l e   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' p o s t _ t i t l e ' ] ) ; 
                                         $ p o s t s _ c a t _ i d   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' p o s t _ c a t e g o r y _ i d ' ] ) ; 
                                         $ p o s t s _ s t a t u s   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' p o s t _ s t a t u s ' ] ) ; 
                                         $ p o s t s _ i m a g e   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' p o s t _ i m a g e ' ] ) ; 
                                         $ p o s t s _ c o n t e n t   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' p o s t _ c o n t e n t ' ] ) ; 
                                         $ p o s t s _ t a g s   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' p o s t _ t a g s ' ] ) ; 
                                         $ p o s t s _ c o m m e n t _ c o u n t   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' p o s t _ c o m e n t _ c o u n t ' ] ) ; 
                                         $ p o s t s _ d a t e   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' p o s t _ d a t e ' ] ) ; 
 
                 } 
               
               i f   ( i s s e t ( $ _ P O S T [ ' u p d a t e _ p o s t ' ] ) )   { 
               
                                         $ p o s t _ a u t h o r   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ _ P O S T [ ' a u t h o r ' ] ) ; 
                                         $ p o s t _ t i t l e   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ _ P O S T [ ' t i t l e ' ] ) ; 
                                         $ p o s t _ c a t _ i d   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ _ P O S T [ ' p o s t _ c a t e g o r y ' ] ) ; 
                                         $ p o s t _ s t a t u s   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ _ P O S T [ ' s t a t u s ' ] ) ; 
                                         $ p o s t _ i m a g e   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ _ F I L E S [ ' i m a g e ' ] [ ' n a m e ' ] ) ; 
                                         $ p o s t _ i m a g e _ t e m p   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ _ F I L E S [ ' i m a g e ' ] [ ' t m p _ n a m e ' ] ) ; 
                                         $ p o s t _ c o n t e n t   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ _ P O S T [ ' p o s t _ c o n t e n t ' ] ) ; 
                                         $ p o s t _ t a g s   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ _ P O S T [ ' p o s t _ t a g s ' ] ) ; 
                                         
                                     m o v e _ u p l o a d e d _ f i l e ( $ p o s t _ i m a g e _ t e m p ,   " . . / i m a g e s / $ p o s t _ i m a g e " ) ; 
 
                                     i f   ( e m p t y ( $ p o s t _ i m a g e ) )   { 
                                         $ q u e r y   =   " S E L E C T   *   F R O M   p o s t   W H E R E   p o s t _ i d   =   ' $ t h e _ p o s t _ i d '   " ; 
                                         $ s e l e c t _ i m a g e   =   m y s q l i _ q u e r y ( $ c o n n e c t i o n ,   $ q u e r y ) ; 
 
                                         w h i l e   ( $ r o w   =   m y s q l i _ f e t c h _ a r r a y ( $ s e l e c t _ i m a g e ) )   { 
                                             $ p o s t _ i m g e   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' p o s t _ i m a g e ' ] ) ; 
                                         } 
                                     } 
 
                                     $ q u e r y   =   " U P D A T E   p o s t   S E T   " ; 
                                     $ q u e r y   . = " p o s t _ t i t l e   =   ' $ p o s t _ t i t l e ' ,   " ; 
                                     $ q u e r y   . = " p o s t _ c a t e g o r y _ i d   =   ' $ p o s t _ c a t _ i d ' ,   " ; 
                                     $ q u e r y   . = " p o s t _ d a t e   =   n o w ( ) ,   " ; 
                                     $ q u e r y   . = " p o s t _ a u t h o r   =   ' $ p o s t _ a u t h o r ' ,   " ; 
                                     $ q u e r y   . = " p o s t _ s t a t u s   =   ' $ p o s t _ s t a t u s ' ,   " ; 
                                     $ q u e r y   . = " p o s t _ t a g s   =   ' $ p o s t _ t a g s ' ,   " ; 
                                     $ q u e r y   . = " p o s t _ c o n t e n t   =   ' $ p o s t _ c o n t e n t '   " ; 
                                     $ q u e r y   . = " W H E R E   p o s t _ i d   =   ' $ t h e _ p o s t _ i d '   " ; 
                                     
 
                                     $ u p d a t e _ p o s t   =   m y s q l i _ q u e r y ( $ c o n n e c t i o n ,   $ q u e r y ) ; 
                                     c o n f i r m Q u e r y ( $ u p d a t e _ p o s t ) ; 
                 } 
 
 ? > 
 < f o r m   a c t i o n = " "   m e t h o d = " P O S T "   e n c t y p e = " m u l t i p a r t / f o r m - d a t a " > 
 	 < d i v   c l a s s = " f o r m - g r o u p " > 
 	 	 < l a b e l   f o r = " t i t l e " > P o s t   T i t l e < / l a b e l > 
 	 	 < i n p u t   v a l u e = " < ? p h p   e c h o   $ p o s t s _ t i t l e ;   ? > "   t y p e = " t e x t "   c l a s s = " f o r m - c o n t r o l "   n a m e = " t i t l e " > 
 	 < / d i v > 
 
         < d i v   c l a s s = " f o r m - g r o u p " > 
         	 < s e l e c t   n a m e = " p o s t _ c a t e g o r y "   i d = " p o s t _ c a t e g o r y " > 
         	     < ? p h p 
 
                     $ q u e r y   =   " s e l e c t   *   f r o m   c a t e g o r i e s " ; 
                     $ s e l e c t _ c a t e g o r i e s   =   m y s q l i _ q u e r y ( $ c o n n e c t i o n ,   $ q u e r y ) ; 
                     
                     c o n f i r m Q u e r y ( $ s e l e c t _ c a t e g o r i e s ) ; 
 
                     w h i l e   ( $ r o w   =   m y s q l i _ f e t c h _ a s s o c ( $ s e l e c t _ c a t e g o r i e s ) )   { 
                     $ c a t _ i d   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' i d ' ] ) ; 
                     $ c a t _ t i t l e   =   m y s q l i _ r e a l _ e s c a p e _ s t r i n g ( $ c o n n e c t i o n , $ r o w [ ' c a t t i t l e ' ] ) ; 
 
                     e c h o   " < o p t i o n   v a l u e = ' $ c a t _ i d ' > $ c a t _ t i t l e < / o p t i o n > " ; 
 } 
 
         	     ? > 
 
               < / s e l e c t > 
         < / d i v > 
 
         < d i v   c l a s s = " f o r m - g r o u p " > 
 	 	 < l a b e l   f o r = " t i t l e " > P o s t   A u t h o r < / l a b e l > 
 	 	 < i n p u t   v a l u e = " < ? p h p   e c h o   $ p o s t s _ a u t h o r ;   ? > "   t y p e = " t e x t "   c l a s s = " f o r m - c o n t r o l "   n a m e = " a u t h o r " > 
 	 < / d i v > 
 
 	 < d i v   c l a s s = " f o r m - g r o u p " > 
 	 	 < l a b e l   f o r = " p o s t _ s t a t u s " > P o s t   S t a t u s < / l a b e l > 
 	 	 < i n p u t   v a l u e = " < ? p h p   e c h o   $ p o s t s _ s t a t u s ;   ? > "   t y p e = " t e x t "   c l a s s = " f o r m - c o n t r o l "   n a m e = " s t a t u s " > 
 	 < / d i v > 
 
 	 < d i v   c l a s s = " f o r m - g r o u p " > 
 	 	 < i m g   w i d t h = " 1 0 0 "   s r c = " . . / i m a g e s / < ? p h p   e c h o   $ p o s t s _ i m a g e ;   ? > "   a l t = " " > 
 	 	 < i n p u t   t y p e = " f i l e "   n a m e = " i m a g e " > 
 	 < / d i v > 
 
 	 < d i v   c l a s s = " f o r m - g r o u p " > 
 	 	 < l a b e l   f o r = " p o s t _ t a g s " > P o s t   T a g s < / l a b e l > 
 	 	 < i n p u t   v a l u e = " < ? p h p   e c h o   $ p o s t s _ t a g s ;   ? > "   t y p e = " t e x t "   c l a s s = " f o r m - c o n t r o l "   n a m e = " p o s t _ t a g s " > 
 	 < / d i v > 
 
 	 < d i v   c l a s s = " f o r m - g r o u p " > 
 	 	 < l a b e l   f o r = " p o s t _ c o n t e n t " > P o s t   C o n t e n t < / l a b e l > 
 	 	 < t e x t a r e a   c l a s s = " f o r m - c o n t r o l "   n a m e = " p o s t _ c o n t e n t "   i d = " "   c o l s = " 3 0 "   r o w s = " 1 0 " > < ? p h p   e c h o   $ p o s t s _ c o n t e n t ;   ? > < / t e x t a r e a > 
 	 < / d i v > 
 
 	 < d i v   c l a s s = " f o r m - g r o u p " > 
 	 	 < i n p u t   t y p e = " s u b m i t "   c l a s s = " b t n   b t n - p r i m a r y "   n a m e = " u p d a t e _ p o s t "   v a l u e = " P u b l i s h   P o s t " > 
 	 < / d i v > 
 < / f o r m >