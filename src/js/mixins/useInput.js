export const useInput = controller => {
  Object.assign(controller, {
    dispatchInputChange(detail) {
      controller.element.dispatchEvent(new CustomEvent('input:change', {
        detail,
        bubbles: true,
      }));
    }
  })
}