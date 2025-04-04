export interface UserInterface {
   id?:number;
   firstName : string;
   lastName: string;
   profile:string;
   cni:number;
   email: string;
   organisation:string;
   address:string;
   phone:number;
   identificationNumber:string;
   password:string;
   isAcceptedCondition:boolean;
   isAcceptedBiometric:boolean;
}
